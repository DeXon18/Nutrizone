<?php

namespace App\Services;

use App\Models\User;
use Exception;

class NutritionCalculatorService
{
    // ... (constantes, no cambian) ...
    private const ACTIVITY_FACTORS = [
        'Sedentario' => 1.2,
        'Ligero' => 1.375,
        'Moderado' => 1.55,
        'Activo' => 1.725,
        'Muy Activo' => 1.9,
    ];

    private const GOAL_ADJUSTMENTS = [
        'Perder peso' => 0.85,
        'Mantener' => 1.0,
        'Ganar músculo' => 1.15,
    ];
    
    private const DEFAULT_MACRO_DISTRIBUTION = [
        'protein' => 0.30,
        'carbs' => 0.40,
        'fat' => 0.30,
    ];

    public function calculate(User $user): array
    {
        $this->validateUserProfile($user);

        $bmr = $this->calculateBmr($user);
        $tdee = $this->calculateTdee($bmr, $user->activity_level);
        $targetCalories = $this->adjustCaloriesForGoal($tdee, $user->goal);
        
        $macrosInGrams = $this->distributeMacros($targetCalories);

        return [
            'bmr' => round($bmr),
            'tdee' => round($tdee),
            'target_calories' => round($targetCalories),
            'macros' => [
                'protein' => round($macrosInGrams['protein']), // <-- CORREGIDO
                'carbs' => round($macrosInGrams['carbs']),     // <-- CORREGIDO
                'fat' => round($macrosInGrams['fat']),         // <-- CORREGIDO
            ]
        ];
    }
    
    // ... (validateUserProfile y calculateBmr no cambian) ...
    private function validateUserProfile(User $user): void
    {
        $requiredFields = ['age', 'gender', 'weight', 'height', 'activity_level', 'goal'];
        foreach ($requiredFields as $field) {
            if (is_null($user->$field)) {
                throw new Exception("El perfil del usuario es incompleto. Falta el campo: {$field}");
            }
        }
    }
    
    private function calculateBmr(User $user): float
    {
        if ($user->gender === 'Hombre') {
            return (10 * $user->weight) + (6.25 * $user->height) - (5 * $user->age) + 5;
        }
        return (10 * $user->weight) + (6.25 * $user->height) - (5 * $user->age) - 161;
    }

    private function calculateTdee(float $bmr, string $activityLevel): float
    {
        $factor = self::ACTIVITY_FACTORS[$activityLevel] ?? 1.2;
        return $bmr * $factor;
    }

    private function adjustCaloriesForGoal(float $tdee, string $goal): float
    {
        $adjustment = self::GOAL_ADJUSTMENTS[$goal] ?? 1.0;
        return $tdee * $adjustment;
    }
    
    private function distributeMacros(float $calories): array
    {
        $distribution = self::DEFAULT_MACRO_DISTRIBUTION;
        
        $protein = ($calories * $distribution['protein']) / 4; // <-- CORREGIDO
        $carbs = ($calories * $distribution['carbs']) / 4;     // <-- CORREGIDO
        $fat = ($calories * $distribution['fat']) / 9;         // <-- CORREGIDO

        return compact('protein', 'carbs', 'fat'); // <-- CORREGIDO
    }
}