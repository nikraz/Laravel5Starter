<?php

return [
    /*
     |--------------------------------------------------------------------------
     | The configurations of search index.
     |--------------------------------------------------------------------------
     |
     | The "path" is the path to Lucene search index.
     |
     | The "models" is the list of the descriptions for models. Each description
     | must contains class of model and fields available for search indexing.
     |
     | For example, model's description can be like this:
     |
     |      namespace\ModelClass::class => [
     |          'fields' => [
     |              'name', 'description', // Fields for indexing.
     |          ]
     |      ]
     |
     */
    'index' => [

        'path' => storage_path('app') . '/lucene-search/index',

        'models' => [
            App\Models\User::class => [
                'fields' => [
                    'username', 'email', 'last_activity', 'created_at', 'confirmed_at', 'confirm_token',
                ],
                'optional_attributes' => true

            ],
            App\Models\Role::class => [
                'fields' => [
                    'role'
                ]
             ]
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | ZendSearch token filters.
     |--------------------------------------------------------------------------
     |
     | The "filters" is the list of ZendSearch token filters classes. Each class
     | must implement the TokenFilterInterface interface. Stemming token filter
     | for english and russian words is enabled by default. To disable it remove
     | class 'Nqxcode\Stemming\TokenFilterEnRu' from token filters.
     |
     | The "stopwords" is the list of paths to files with stopwords. By default
     | english and russian stopwords are used.
     |
    */
    'analyzer' => [

        'filters' => [
            Nqxcode\Stemming\TokenFilterEnRu::class,
        ],

        'stopwords' => Nqxcode\LuceneSearch\Analyzer\Stopwords\Files::get(),
    ],
];