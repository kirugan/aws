<?php
namespace Kirugan;

/**
 * @property \Aws\S3\S3Client $s3
 * @property \Aws\Ec2\Ec2Client $ec2
 * @property \Aws\DynamoDb\DynamoDbClient $dynamoDb
 */
class Aws
{
    private $sdk;

    private function __construct()
    {
        $this->sdk = new \Aws\Sdk([
            'version' => 'latest',
            'region'  => 'us-east-1'
        ]);
    }

    /**
     * @return static
     */
    public static function instance()
    {
        static $instance;
        if ($instance === null) {
            $instance = new static();
        }

        return $instance;
    }

    public function __get($name)
    {
        static $cache = [];

        $key = strtolower($name);
        if (!isset($cache[$key])) {
            $cache[$key] = $this->sdk->{"create$name"}();
        }

        return $cache[$key];
    }

    public function __call($name, array $arguments)
    {
        return $this->sdk->{"create$name"}($arguments);
    }
}