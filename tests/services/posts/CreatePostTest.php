<?php

namespace Tests\Servcies\Posts;

use App\Services\Posts\CreatePost;
use PHPUnit\Framework\TestCase;

final class CreatePostTest extends TestCase
{
    public function testAddNumbers(): void
    {
        $createpost = new CreatePost();
        $result = $createpost->addNumbers(2, 3);

        $this->assertEquals(5, $result);
    }
}
