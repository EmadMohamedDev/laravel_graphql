<?php

namespace App\GraphQL\Type;

use App\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Category',
        'description'   => 'A category',
        'model'         => Category::class,
    ];

    public function fields(): array
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
            ],
        ];
    }

    // You can also resolve a field by declaring a method in the class
    // with the following format resolve[FIELD_NAME]Field()
    protected function resolveImageField($root, $args)
    {
        return url($root->image);
    }
}
