<?php

namespace App\Constants\Resend\Messages;

final class NotificationMessages
{
    public const SHARED_TASK_LIST_MESSAGE = '%s ha compartido contigo una nueva lista de tareas';
    public const STORE_TASK_MESSAGE_EMAIL_SUBJECT = 'Actualización sobre la lista compartida: %s';
    public const STORE_TASK_MESSAGE_EMAIL_BODY = 'Se ha agregado una nueva tarea: %s.';

    public const DELETE_TASK_MESSAGE_EMAIL_SUBJECT = 'Actualización sobre la lista compartida: %s';
    public const DELETE_TASK_MESSAGE_EMAIL_BODY = 'Se ha eliminado la lista compartida: %s.';
}
