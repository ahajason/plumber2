<?php

$options = [
    'app_name' => 'ExampleWorker',
    'queues' => [
        'default' => [
            'type' => 'redis',
            'host' => '127.0.0.1',
            'port' => '6379'
        ]
    ],
    'rate_limiter' => [
        'default' => [
            'storage' => 'redis',
            'redis' => ['host' => '127.0.0.1', 'port' => '6379', 'password' => null],
            'allowance' => 5, // 限制每60秒最多消费1000个
            'period' => 60,
        ]
    ],
    'workers' => [
        [
            'class' => 'Codeages\Plumber\Example\Example1Worker',
            'num' => 1,
            'queue' => 'default',
            'topic' => 'test_topic_1',
            'consume_limiter' => 'default',
        ],
        [
            'class' => 'Codeages\Plumber\Example\Example2Worker',
            'num' => 1,
            'queue' => 'default',
            'topic' => 'test_topic_2',
        ]
    ],
    'log_path' => __DIR__ . '/plumber.log',
    'pid_path' => __DIR__ . '/plumber.pid',

];

class ExampleContainer implements \Psr\Container\ContainerInterface
{
    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }
}

return [
    'options' => $options,
    'container' => new ExampleContainer(),
];