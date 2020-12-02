<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// Create fake functions so cart.php can run
function add_action($name, $functionToCall) {}
function add_filter($name, $functionToCall) {}

// This file needs the constans ABSPATH
define('ABSPATH', "for testing purposes");
require_once __DIR__ . "/../includes/cart.php";


class CartTest extends TestCase {

    public function test_input_cart_okWhenNotAddToCart(): void
    {
        // Arrange
        // Act
        input_cart();

        // Assert
        $this->assertTrue(true);
    }

    public function test_input_cart_queriesDb(): void
    {
        // Testa att metoden $wpdb->query anropas
        // Arrange
        global $wpdb;
        $wpdb = $this->createMock(FakeWpdb::class);
        $wpdb->expects($this->once())
             ->method('query')
             ->with($this->equalTo(NULL));
        $_POST['add_to_cart'] = 'yes';
        $_POST['id'] = 1;

        // Act
        input_cart();

        // Assert
    }



    public function test_add_to_cart_whenNotInLoop_returnsContent(): void
    {
        // Arrange
        $content = 'This is a content';

        // Act
        $actual = add_to_cart($content);

        // Assert
        $this->assertEquals($actual, $content);
    }
}

class FakeWpdb {
    public function prepare($query, $a, $b) {}
    public function query($query) {}
}


function get_current_user_id() { return 1; }
function get_the_ID() {}

function in_the_loop() { return false; }
function is_main_query() { return true; }
