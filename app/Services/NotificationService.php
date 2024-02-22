<?php

// app/Services/NotificationService.php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    /**
     * Bildirim oluşturur.
     *
     * @param  string  $type
     * @param  int  $typeId
     * @param  string  $message
     * @return \App\Models\Notification
     */
    public function createNotification($type, $typeId, $message)
    {
        return Notification::create([
            'type' => $type,
            'type_id' => $typeId,
            'message' => $message,
        ]);
    }
}
