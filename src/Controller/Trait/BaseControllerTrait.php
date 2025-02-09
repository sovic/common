<?php

namespace Sovic\Common\Controller\Trait;

use Symfony\Component\HttpFoundation\Response;

trait BaseControllerTrait
{
    private array $parameters = [];
    private string $locale = 'cs';

    protected function assign(string $key, mixed $val): void
    {
        $this->parameters[$key] = $val;
    }

    protected function assignArray(array $data): void
    {
        foreach ($data as $key => $val) {
            $this->parameters[$key] = $val;
        }
    }

    protected function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    protected function getRenderParameters(array $parameters = []): array
    {
        $locale = $this->locale;
        $lang = explode('_', $locale)[0] ?? 'cs';

        $parameters['lang'] = $lang;
        $parameters['locale'] = $locale;

        foreach ($this->parameters as $key => $val) {
            $parameters[$key] = $val;
        }

        return $parameters;
    }

    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $parameters = $this->getRenderParameters($parameters);

        return parent::render($view, $parameters, $response);
    }

    protected function render404(string $template = 'page/404.html.twig', array $parameters = []): Response
    {
        $response = new Response();
        $response->setStatusCode(404);

        return $this->render($template, $parameters, $response);
    }

    protected function render403(string $template = 'page/403.html.twig', array $parameters = []): Response
    {
        $response = new Response();
        $response->setStatusCode(403);

        return $this->render($template, $parameters, $response);
    }

    protected function render500(string $template = 'page/500.html.twig', array $parameters = []): Response
    {
        $response = new Response();
        $response->setStatusCode(500);

        return $this->render($template, $parameters, $response);
    }
}
