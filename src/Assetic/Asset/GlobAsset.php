<?php

namespace Assetic\Asset;

/**
 * A collection of assets loaded by glob.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class GlobAsset extends AssetCollection
{
    /**
     * Constructor.
     *
     * @param string|array $globs   A single glob path or array of paths
     * @param array        $filters An array of filters
     */
    public function __construct($globs, $filters = array())
    {
        $assets = array();
        foreach ((array) $globs as $glob) {
            if (false !== $paths = glob($glob)) {
                foreach ($paths as $path) {
                    $assets[] = new FileAsset($path);
                }
            }
        }

        parent::__construct($assets, $filters);
    }
}