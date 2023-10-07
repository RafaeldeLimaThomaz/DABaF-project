<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser as DuskBrowser;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (DuskBrowser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }
}
