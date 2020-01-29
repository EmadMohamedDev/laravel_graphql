<?php

namespace App\GraphQL\Type;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'User',
        'description'   => 'A user',
        'model'         => User::class,
    ];

    public function fields(): array
    {
        return [
            'id'    => [
                'type' => Type::nonNull(Type::Id()),
                'description' => 'The id of the user'
            ],
            'name'  => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'admin' => [
                'type' => Type::string(),
                'description' => 'admin'
            ],
            // 'isMe'  => [
            //     'type' => Type::boolean(),
            //     'description' => 'True, if the queried user is the current user',
            //     'selectable' => false, // Does not try to query this from the database
            // ]
        ];
    }

    // You can also resolve a field by declaring a method in the class
    // with the following format resolve[FIELD_NAME]Field()
    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}
