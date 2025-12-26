<?php

namespace kyurzburg\asynctaskcb;

use pocketmine\Server;

class AsyncTaskCB{

    private static int $next_id = 0;

    /** @var \Closure[] */
    private static array $callbacks = [];

    public static function getNextId() : int {
        return self::$next_id++;
    }

    public static function new(AsyncCallbackTask $task, ?callable $callback = null){
        $id = self::getNextId();
        self::$callbacks[$id] = $callback ?? function($result){};

        $task->setCallbackId($id);
        self::$callbacks[$id] = $callback;

        Server::getInstance()->getAsyncPool()->submitTask($task);
    }

    public static function resolve(int $id, mixed $result) : void {
        (self::$callbacks[$id])($result);
        unset(self::$callbacks[$id]);
    }
}
