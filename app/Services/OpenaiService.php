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
                $results = $result->choices[0]->message->content ?? $string;
            }

            $originalParamters = getTranslationParameters($string);
            $translatedParameters = getTranslationParameters($results);

            // get those that are in translated, but not in original;
            $addedParameters = array_diff($translatedParameters, $originalParamters);

            foreach($addedParameters as $addedParameter) {
                $results = str_replace($addedParameter, str_replace(':', '', $addedParameter), $results);
            }

            $originalParamters = getTranslationParameters($string);
            $translatedParameters = getTranslationParameters($results);

            if(count($originalParamters) > 0 || count($translatedParameters) > 0) {
                var_dump($originalParamters);
                var_dump($translatedParameters);
            }

            // check if all values in the original parameters are present in the translated parameters, and vice versa
            if(count(array_diff($originalParamters, $translatedParameters)) == 0 && count(array_diff($translatedParameters, $originalParamters)) == 0) {
                return $results;
            } else {
                return null;
            }

        } catch (\Throwable $th) {
            return null;
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
