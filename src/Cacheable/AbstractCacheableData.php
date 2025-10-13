<?php /** @noinspection PhpClassCanBeReadonlyInspection */

namespace Sovic\Common\Cacheable;

use Countable;
use Psr\Cache\InvalidArgumentException;
use RuntimeException;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

abstract class AbstractCacheableData
{
    public function __construct(private readonly CacheInterface $cache)
    {
    }

    abstract protected function getCacheKey(): string;

    protected function getExpiresAfer(): ?int
    {
        return null;
    }

    abstract protected function getFreshData(): mixed;

    public function getData(): mixed
    {
        $cacheKey = $this->getCacheKey();
        $expiresAfer = $this->getExpiresAfer();

        $cache = $this->cache;

        try {
            $data = $cache->get($cacheKey, function (ItemInterface $cacheItem) use ($expiresAfer) {
                if ($expiresAfer !== null) {
                    $cacheItem->expiresAfter($expiresAfer);
                }

                return $this->getFreshData();
            });
        } catch (InvalidArgumentException $e) {
            throw new RuntimeException('Cache error: ' . $e->getMessage(), 0, $e);
        }

        return $data;
    }

    public function getSlice(int $offset, int $length): array
    {
        $data = $this->getData();

        if (!is_array($data) && !$data instanceof Countable) {
            throw new RuntimeException('Data is not countable');
        }

        return array_slice($data, $offset, $length);
    }

    public function getCount(): int
    {
        $data = $this->getData();

        if (is_countable($data) || $data instanceof Countable) {
            return count($data);
        }

        throw new RuntimeException('Data is not countable');
    }

    public function warmUp(): void
    {
        $this->getData();
    }
}
