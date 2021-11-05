<?php

namespace YannLo\Basic\Framework;

/**
 * Module
 *
 * To get basic configuration to module
 */
abstract class Module
{
    /**
     * @var string|null DEFINITIONS
     *
     * indicates if a configuration file exists
     */
    public const DEFINITIONS = null;


    /**
     * @var string|null MIGRATION
     *
     * indicates if a migration folder exists
     */
    public const MIGRATION = null;


    /**
     * @var string|null SEEDS
     *
     * indicates if a seeds folder exists
     */
    public const SEEDS = null;
}
