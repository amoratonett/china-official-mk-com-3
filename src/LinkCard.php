<?php

class LinkCard
{
    private string $title;
    private string $url;
    private string $description;
    private string $keyword;

    public function __construct(string $title, string $url, string $description, string $keyword = '')
    {
        $this->title = $title;
        $this->url = $url;
        $this->description = $description;
        $this->keyword = $keyword;
    }

    public function render(): string
    {
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedDescription = htmlspecialchars($this->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedKeyword = htmlspecialchars($this->keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $html = '<div class="link-card">' . PHP_EOL;
        $html .= '    <a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">' . PHP_EOL;
        $html .= '        <div class="link-card-title">' . $escapedTitle . '</div>' . PHP_EOL;
        $html .= '        <div class="link-card-description">' . $escapedDescription . '</div>' . PHP_EOL;
        if ($escapedKeyword !== '') {
            $html .= '        <div class="link-card-keyword">' . $escapedKeyword . '</div>' . PHP_EOL;
        }
        $html .= '    </a>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;

        return $html;
    }

    public static function createDefault(): self
    {
        return new self(
            'MK体育 - 官方平台',
            'https://china-official-mk.com',
            '提供最新体育赛事资讯与互动体验，mk体育引领运动潮流。',
            'mk体育'
        );
    }
}

function renderLinkCard(string $title, string $url, string $description, string $keyword = ''): string
{
    $card = new LinkCard($title, $url, $description, $keyword);
    return $card->render();
}

// 示例用法
$cardHtml = renderLinkCard(
    'MK体育 - 官方平台',
    'https://china-official-mk.com',
    '提供最新体育赛事资讯与互动体验，mk体育引领运动潮流。',
    'mk体育'
);

echo $cardHtml;

// 或者使用默认卡片
$defaultCard = LinkCard::createDefault();
echo $defaultCard->render();