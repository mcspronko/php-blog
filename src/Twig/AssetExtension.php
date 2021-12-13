<?php

declare(strict_types=1);

namespace Blog\Twig;

use Psr\Http\Message\ServerRequestInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AssetExtension extends AbstractExtension
{
    /**
     * @var ServerRequestInterface
     */
    private ServerRequestInterface $request;

    /**
     * AssetExtension constructor.
     * @param ServerRequestInterface $request
     */
    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return array|TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('asset_url', [$this, 'getAssetUrl']),
            new TwigFunction('url', [$this, 'getUrl']),
            new TwigFunction('base_url', [$this, 'getBaseUrl']),
        ];
    }

    /**
     * @param string $path
     * @return string
     */
    public function getAssetUrl(string $path): string
    {
        return $this->getBaseUrl() . $path;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        $params = $this->request->getServerParams();
        $scheme = $params['REQUEST_SCHEME'] ?? 'http';
        return  $scheme . '://' . $params['HTTP_HOST'] . '/';
    }

    /**
     * @param string $path
     * @return string
     */
    public function getUrl(string $path): string
    {
        return $this->getBaseUrl() . $path;
    }
}
