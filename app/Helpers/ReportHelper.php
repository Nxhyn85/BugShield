<?php 
namespace App\Helpers;

class ReportHelper
{
    public static function getSeverityColor($severity)
    {
        $severityColors = [
            'critical' => 'text-red-600',
            'high' => 'text-pink-600',
            'medium' => 'text-yellow-400',
            'low' => 'text-gray-500',
        ];

        return $severityColors[$severity] ?? '';
    }

    public static function getStatusColor($status)
    {
        $statusColors = [
            'new' => 'text-blue-400',
            'not applicable' => 'text-red-500',
            'accepted' => 'text-green-500',
        ];

        return $statusColors[$status] ?? '';
    }
}


?>