<?php

namespace App\Services;

class Say
{
    public function say(string $comment){
        echo '「' . $comment.'」と言った。';
    }
}