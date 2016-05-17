<?php namespace Modules\Page\Tests;

class PagesTest extends BasePageTest
{
    /** @test */
    public function it_makes_page_as_homepage()
    {
        $page = $this->page->create([
            'is_home' => 1,
            'template' => 'default',
            'en' => [
                'title' => 'My Page',
                'slug' => 'my-page',
                'body' => 'My Page Body',
            ],
        ]);
        
        $homepage = $this->page->findHomepage();
        
        $this->assertTrue($page->is_home);
        $this->assertEquals($page->id, $homepage->id);
    }
}
