<?php

namespace App\GraphQL\Query;

use Closure;
use App\Category;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class CategoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'Categories query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('category'));
    }

    public function args(): array
    {
        return [
            'id'    => [
                'type' => Type::string(),
                'description' => 'The id of the category'
            ],
            'title'  => [
                'type' => Type::string(),
                'description' => 'The title of the category'
            ],
            'image' => [
                'type' => Type::string(),
                'description' => 'The image of category'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return Category::where('id' , $args['id'])->get();
        }

        if (isset($args['title'])) {
            return Category::where('title', $args['title'])->get();
        }

        return Category::all();
    }
}
