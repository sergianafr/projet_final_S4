<?php if (!defined('BASEPATH')) exit('No direct script access 
allowed');

if (!function_exists('get_date_fin')) {
    function get_date_fin($startDateTime, $duration)
    {
        // Définir les heures de début et de fin de la journée de travail
        $workDayStart = 8;
        $workDayEnd = 18;

        $durationHours = (int) explode(':', $duration)[0];
        $durationMinutes = (int) explode(':', $duration)[1];
        false;
        // Convertir la date et l'heure de début en objet DateTime
        $start = new DateTime($startDateTime);

        // Obtenir l'heure de début en heures et minutes
        $startHour = (int)$start->format('H');
        $startMinute = (int)$start->format('i');

        // Calculer la durée totale en minutes
        $totalDurationMinutes = ($durationHours * 60) + $durationMinutes;

        // Initialiser la date et l'heure de fin avec la date et l'heure de début
        $end = clone $start;

        while ($totalDurationMinutes > 0) {
            // Si l'heure actuelle est après l'heure de fin de la journée de travail
            if ($startHour >= $workDayEnd) {
                // Passer à 8h le lendemain
                $end->setTime($workDayStart, 0);
                $end->modify('+1 day');
                $startHour = $workDayStart;
                $startMinute = 0;
            }

            // Calculer le nombre de minutes restantes jusqu'à la fin de la journée de travail
            $remainingMinutesInDay = (($workDayEnd - $startHour) * 60) - $startMinute;

            if ($totalDurationMinutes <= $remainingMinutesInDay) {
                // Si la durée restante tient dans la journée de travail actuelle, ajouter la durée
                $end->modify("+$totalDurationMinutes minutes");
                $totalDurationMinutes = 0;
            } else {
                // Sinon, avancer jusqu'à la fin de la journée de travail et continuer le lendemain
                $end->modify("+$remainingMinutesInDay minutes");
                $totalDurationMinutes -= $remainingMinutesInDay;
                $startHour = $workDayEnd;
            }
        }

        return $end->format('Y-m-d H:i:s');
    }
}

if (!function_exists('get_date')) {
    function get_date($date_rdv, $heure)
    {
        $dateObj = new DateTime($date_rdv);

        // Conversion de la chaîne d'heure en un objet DateTime
        $heureObj = DateTime::createFromFormat('H:i', $heure);

        // Ajout de l'heure à la date
        $dateObj->setTime($heureObj->format('H'), $heureObj->format('i'), $heureObj->format('s'));

        // Formatage de la date et de l'heure combinées
        $formattedDate = $dateObj->format('Y-m-d H:i:s');
        return $formattedDate;
    }
}

if (!function_exists('valid_format')) {
    function valid_format($date) {
        // Regular expression to match the 'yyyy-mm-dd' format
        $pattern2 = '/^\d{2}-\d{2}-\d{4}$/';
        $pattern = '/^\d{2}\/\d{2}\/\d{4}$/';
        
        // Check if the input date matches the pattern
        if (preg_match($pattern, $date)) {
            // Further validation to check if it's a valid date
            $date_parts = explode('/', $date);
            return checkdate($date_parts[1], $date_parts[0], $date_parts[2]);
            
        }
        return false;
    }
}

if (!function_exists('transformDate')) {
function transformDate($date) {
    // Create a DateTime object from the given date string
    $dateObject = DateTime::createFromFormat('d/m/Y', $date);

    // Check if the date object was created successfully
    if ($dateObject) {
        // Return the date in 'Y-m-d' format
        return $dateObject->format('Y-m-d');
    } else {
        // Handle invalid date format
        return false;
    }
}
}