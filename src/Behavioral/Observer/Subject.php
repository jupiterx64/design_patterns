<?php

namespace DP\Behavioral\Observer;

abstract class Subject
{
    protected $price;
    protected $observers = [];

    // attach "someone" (observer, listener) who should be notified about changes
    public function attach(IObserver $observer) {
        array_push($this->observers, $observer);
    }

    // detach "someone" (observer, listener) who should not be notified
    public function detach(IObserver $observer) {
        $position = 0;

        foreach ($this->observers as &$ob) {

            if ($ob->getId() == $observer->getId()) {
                array_splice($this->observers, $position, 1);
            }

            $position++;
        }
    }

    public function notify() {
        foreach ($this->observers as $ob) {
            $ob->update($this);
        }
    }
}
