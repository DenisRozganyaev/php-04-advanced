<?php

namespace Patterns\Observer\Notification\Publisher;

use Patterns\Observer\Interfaces\ListenerContract;

class NotificationManager
{
    protected static NotificationManager|null $instance = null;

    protected array $listeners = [];

    public function __construct()
    {
        $this->listeners['*'] = [];
    }

    public static function getInstance(): NotificationManager
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    protected function initGroup(string $event = '*')
    {
        if (!isset($this->listeners[$event])) {
            $this->listeners[$event] = [];
        }
    }

    protected function getListenersByEvent(string $event = '*')
    {
        $this->initGroup($event);

        return $event === '*' ? $this->listeners['*'] : array_merge($this->listeners[$event], $this->listeners['*']);
    }

    public function attach(ListenerContract $listener, string $event = '*'): void
    {
        $this->initGroup($event);

        if (!in_array($listener, $this->listeners)) {
            $this->listeners[$event][] = $listener;
        }
    }

    public function detach(ListenerContract $listener, string $event = '*'): void
    {
        foreach ($this->getListenersByEvent($event) as $k => $subscriber) {
            if ($subscriber === $listener) {
                unset($this->listeners[$event][$k]);
            }
        }
    }

    public function notify(string $event = '*', float $total = 0): void
    {
        foreach ($this->getListenersByEvent($event) as $k => $subscriber) {
            $subscriber->update($this, $total);
        }
    }
}