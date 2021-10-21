<?php


namespace Reactificate\Utils;


use Exception;

class Config
{
    protected static array $loaded = [];
    protected array $configuration = [];

    /**
     * Config constructor.
     * @param string $configFile
     * @throws Exception
     */
    public function __construct(string $configFile)
    {
        if (file_exists($configFile)) {
            // Absolute path
            $fileLocation = $configFile;
        } else {
            // Relative path
            $fileLocation = Utils::getConfigDirectory() . "$configFile.php";
        }

        if (!array_key_exists($fileLocation, self::$loaded)) {
            if (!file_exists($fileLocation)) {
                throw new Exception("Configuration file \"$fileLocation\" does not exists.");
            }

            $this->configuration = require $fileLocation;
            self::$loaded[$fileLocation] = $this->configuration;
        } else {
            $this->configuration = self::$loaded[$fileLocation];
        }
    }

    /**
     * @param string $configFile
     * @return Config
     * @throws Exception
     */
    public static function load(string $configFile): Config
    {
        return new Config($configFile);
    }

    /**
     * Get all configurations
     *
     * @return array
     */
    public function all(): array
    {
        return $this->configuration;
    }

    /**
     * Pluck item form configuration
     *
     * @param string|array $key
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (is_array($key)) {
            $values = [];

            foreach ($key as $itemKey) {
                $values[] = ArrayHelper::get($this->configuration, $itemKey, $default);
            }

            return $values;
        }

        return ArrayHelper::get($this->configuration, $key, $default);
    }

    /**
     * Check if configuration with certain key exists
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return ArrayHelper::has($this->configuration, $key);
    }
}