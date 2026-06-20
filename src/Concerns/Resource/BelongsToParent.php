<?php

declare(strict_types=1);

namespace Webkernel\Component\Plugin\Concerns\Resource;

trait BelongsToParent
{
    use DelegatesToPlugin;

    public static function getParentResource(): ?string
    {
        $pluginResult = static::delegateToPlugin(
            'BelongsToParent',
            'getParentResource'
        );

        if (! static::isNoPluginResult($pluginResult) && $pluginResult !== null) {
            return $pluginResult;
        }

        return static::getParentResult('getParentResource');
    }
}
