<?php

namespace Murat\Subspace\Tool;

use Exception;
use Murat\Subspace\Core\DBClient;

/**
 * Класс-хелпер для пользователя
 */
class UserHelper
{
    /**
     * Заполнить данные таблиц начальными данными
     * @param string $username
     * @return void
     */
    public static function fillDataForNewUser(string $username): void
    {
        $dbClient = DBClient::getInstance();

        try {
            $dbClient->query("INSERT INTO notes (notes_user, notes_title, notes_text) VALUES ({$username}, 'Первая заметка', 'Это моя самая первая заметка')");

            $dbClient->query(
                "INSERT INTO todo_list (todo_user, todo_name, todo_checked) 
                            VALUES 
                                ({$username}, 'Первая задача', '0'),
                                ({$username}, 'Вторая задача', '0'),
                                ({$username}, 'Третья задача', '0')"
            );

            $dbClient->query(
                "INSERT INTO tracker (tracker_user, tracker_title)
                            VALUES 
                                ({$username}, 'Привычка 1'),
                                ({$username}, 'Привычка 2'),
                                ({$username}, 'Привычка 3'),
                                ({$username}, 'Привычка 4'),
                                ({$username}, 'Привычка 5')"
            );

            $dbClient->query(
                "INSERT INTO timetable (timetable_user, timetable_day)
                            VALUES 
                                ({$username}, '1'),
                                ({$username}, '2'),
                                ({$username}, '3'),
                                ({$username}, '4'),
                                ({$username}, '5'),
                                ({$username}, '6'),
                                ({$username}, '0')"
            );
        } catch (Exception $exception) {
        }
    }
}