<?php

use App\Models\Configuration;

function getConfiguration($key)
{
    return optional(Configuration::where('configuration_key', $key)->first())->configuration_value;
}
