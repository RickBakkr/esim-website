<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class OpenaiService
{
    public function translateString($string = '', $origin = 'nl', $target = null, $context = '', $model = 'gpt-4o-mini')
    {
        if(is_null($target)) {
            return $string;
        }

        try {
            $result = OpenAI::chat()->create([
                'model' => $model,
                'messages' => [
                    ['role' => 'system', 'content' => $this->prompt_system($context)],
                    ['role' => 'user', 'content' => $this->prompt_header($origin, $target)],
                    ['role' => 'user', 'content' => $string]],
                'temperature' => 0.4,
                'n' => 1,
            ]);

            if ($result->choices && count($result->choices) > 0 && $result->choices[0]->message) {
                return $result->choices[0]->message->content ?? $string;

            } else {
                return $string;
            }
        } catch (\Throwable $th) {
            return $string;
        }
    }

    public function prompt_system($context = '')
    {
        if($context != '') {
            return 'You are a translator. Your job is to translate the following text into the specified language, using the given context:' . $context . '.';
        } else {
            return 'You are a translator. Your job is to translate the following text to the language specified in the prompt.';
        }
    }

    public function prompt_header($origin, $target)
    {
        return 'Translate the following text from ' . $origin . ' to ' . $target . ', ensuring you return only the translated content without added quotes or any other extraneous details. Importantly, any word prefixed with the symbol \':\' should remain unchanged. If the text contains HTML tags, keep them exactly as-is. This does not apply to any other symbol.';
    }

}
