<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{

    protected $article;

    protected function setUp(): void
    {
        $this->article = new App\Article;
    }


    public function testTitleIsEmptyByDefault()
    {
        // $article = new App\Article;

        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        // $article = new App\Article;

        // in php null and "" are equal
        $this->assertEquals(
            $this->article->getSlug(),
            ''
        );

        // this is checking if the values are exactly equal
        $this->assertSame(
            $this->article->getSlug(),
            ''
        );
    }

    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugHasWhitespaceReplacedBySingleUnderscore()
    {
        $this->article->title = "An     example    \n    article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->title = " An example article ";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotHaveAnyNonWordCharacters()
    {
        $this->article->title = "Read! This! Now!";

        $this->assertEquals($this->article->getSlug(), "Read_This_Now");
    }

    // Data Provider Method
    public function titleProvider()
    {
        // map is used to replace indexes to more descriptive titles of tests
        return [
            'Slug Has Spaces Replaced By Underscores'
            => ["An example article", "An_example_article"],
            'Slug Has Whitespace Replaced By Single Underscore'
            => ["An    example    \n    article", "An_example_article"],
            'Slug Does Not Start Or End With An Underscore'
            => [" An example article ", "An_example_article"],
            'Slug Does Not Have Any Non Word Characters'
            => ["Read! This! Now!", "Read_This_Now"]
        ];
    }


    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }
}
