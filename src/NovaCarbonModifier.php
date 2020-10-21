<?php

namespace Illizian\NovaCarbonModifier;

use Laravel\Nova\Fields\Field;

class NovaCarbonModifier extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-carbon-modifier';

    /**
     * Set a list of popular modifiers.
     *
     * @param  array $list
     * @return $this
     */
    public function popular($list) : NovaCarbonModifier
    {
        return $this->withMeta([ 'popular' => $list ]);
    }

    /**
     * Takes a $date, and applies the Carbon modifiers defined on this model
     *
     * @param  \Carbon\Carbon $date
     * @param  String $modifiers
     * @return \Carbon\Carbon;
     */
    public static function applyModifier(\Carbon\Carbon $date, String $modifiers) : \Carbon\Carbon
    {
        return collect(explode(',', $modifiers))->reduce(function (\Carbon\Carbon $date, String $modifier) {
            [ $method, $param ] = explode(':', $modifier) + [ null, null ];

            try {
                if ($param !== null) {
                    return $date->{$method}($param);
                } else {
                    return $date->{$method}();
                }
            } catch(\Exception $e) {
                return $date;
            }

        }, $date);
    }
}
