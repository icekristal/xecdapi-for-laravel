<?php

namespace Icekristal\XecdapiForLaravel\Services;

use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Icekristal\XecdapiForLaravel\Services\DTO\AccountInfoResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\ConvertFromResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\ConvertFromToRequestDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\ConvertToResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\CurrenciesRequestDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\CurrenciesResponseDTO;
use Icekristal\XecdapiForLaravel\Services\DTO\ErrorDTO;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class XecdapiService
{
    protected bool $isEnable = false;
    protected bool $isEnableLog = false;
    protected ?string $authUserName = null;
    protected ?string $authPassword = null;
    protected string $baseUrl = 'https://api.xecdapi.com/v1';

    protected PendingRequest $client;

    protected string $additionalPath = '';
    protected array $queryParams = [];
    protected string $method = 'GET';

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->isEnableLog = config('xecdapi.is_enable_log', false);
        $this->isEnable = config('xecdapi.is_enable', false);
        if (!$this->isEnable) return;

        $this->authUserName = config('services.xecdapi.auth.username', null);
        $this->authPassword = config('services.xecdapi.auth.password', null);
        $this->baseUrl = config('services.xecdapi.base_url', $this->baseUrl) . config('xecdapi.api_version', '/v1');

        if (is_null($this->authUserName) || is_null($this->authPassword)) {
            throw new Exception('Xecdapi auth username or password is not set');
        }

        $this->client = Http::withHeaders(['Accept' => 'application/json'])
            ->withBasicAuth($this->authUserName, $this->authPassword)
            ->baseUrl($this->baseUrl);
    }

    /**
     * @throws Exception
     */
    public function getAccountInfo(): AccountInfoResponseDTO
    {
        $this->additionalPath = '/account_info';
        $response = $this->sendRequest();
        $this->writeLog('Get account info', ['response' => $response->json(), 'status' => $response->status()]);
        return new AccountInfoResponseDTO($response->json());
    }

    /**
     * @throws Exception
     */
    public function getCurrencies(): CurrenciesResponseDTO
    {
        $this->additionalPath = '/currencies';
        $requestDTO = new CurrenciesRequestDTO($this->getQueryParams());
        $this->setQueryParams($requestDTO->toArray());
        $response = $this->sendRequest();
        $this->writeLog('getCurrencies', ['response' => $response->json(), 'status' => $response->status(), 'request' => $requestDTO->toArray()]);
        return new CurrenciesResponseDTO($response->json());
    }

    /**
     * @return ConvertFromResponseDTO
     * @throws Exception
     */
    public function convertFrom(): ConvertFromResponseDTO
    {
        $this->additionalPath = '/convert_from';
        $requestDTO = new ConvertFromToRequestDTO($this->getQueryParams());
        $this->setQueryParams($requestDTO->toArray());
        $response = $this->sendRequest();
        $this->writeLog('convertFrom', ['response' => $response->json(), 'status' => $response->status(), 'request' => $requestDTO->toArray()]);
        return new ConvertFromResponseDTO($response->json());
    }

    /**
     * @return ConvertToResponseDTO
     * @throws Exception
     */
    public function convertTo(): ConvertToResponseDTO
    {
        $this->additionalPath = '/convert_to';
        $requestDTO = new ConvertFromToRequestDTO($this->getQueryParams());
        $this->setQueryParams($requestDTO->toArray());
        $response = $this->sendRequest();
        $this->writeLog('convertTo', ['response' => $response->json(), 'status' => $response->status(), 'request' => $requestDTO->toArray()]);
        return new ConvertToResponseDTO($response->json());
    }

    /**
     * @param array $queryParams
     * @return $this
     */
    public function setQueryParams(array $queryParams): XecdapiService
    {
        $this->queryParams = $queryParams;
        return $this;
    }

    /**
     * @throws Exception
     */
    private function sendRequest(): PromiseInterface|Response|ErrorDTO
    {
        $response = $this->method === 'GET' ? $this->client->get($this->additionalPath, $this->queryParams) : $this->client->post($this->additionalPath, $this->queryParams);
        if ($response->failed()) {
            return new ErrorDTO([
                'status' => $response->status(),
                'message' => $response->json()['message'] ?? 'Unknown error',
                'details' => $response->json() ?? null,
            ]);
        }
        return $response;
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    private function writeLog(string $message, array $context = []): void
    {
        if ($this->isEnableLog) {
            Log::channel(config('xecdapi.log_channel', 'daily'))->debug("XecdapiService: " . $message, $context);
        }
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }
}
