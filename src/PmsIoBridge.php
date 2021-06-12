<?php


namespace App\PmsIo;


use App\PmsIo\Request\BaseRequest;
use App\PmsIo\Request\Notes\InsertNotesCategoriesRequest;
use App\PmsIo\Request\Notes\InsertNotesRequest;
use App\PmsIo\Request\Passwords\InsertPasswordsGroupsRequest;
use App\PmsIo\Request\Passwords\InsertPasswordsRequest;
use App\PmsIo\Response\BaseResponse;
use App\PmsIo\Response\Notes\InsertNotesCategoriesResponse;
use App\PmsIo\Response\Notes\InsertNotesResponse;
use App\PmsIo\Response\Passwords\InsertPasswordsGroupsResponse;
use App\PmsIo\Response\Passwords\InsertPasswordsResponse;
use App\PmsIo\Service\GuzzleHttpService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Throwable;
use TypeError;

/**
 * Class PmsIoBridge
 * @package App
 */
class PmsIoBridge
{

    /**
     * @var GuzzleHttpService $guzzleHttpService
     */
    private GuzzleHttpService $guzzleHttpService;

    /**
     * @var string $baseUrl
     */
    private string $baseUrl;

    /**
     * @var Logger $logger
     */
    private Logger $logger;

    /**
     * @var string $login
     */
    private string $login;

    /**
     * @var string $password
     */
    private string $password;

    public function __construct(string $logFilePath, string $loggerName, string $baseUrl, string $login, string $password)
    {
        $this->baseUrl           = $baseUrl;
        $this->guzzleHttpService = new GuzzleHttpService();
        $this->logger            = new Logger($loggerName);
        $this->logger->pushHandler(new StreamHandler($logFilePath, Logger::DEBUG));

        $this->login    = $login;
        $this->password = $password;
    }

    /**
     * Will call the PMS-IO to insert passwords
     *
     * @param InsertPasswordsRequest $request
     * @return InsertPasswordsResponse
     * @throws GuzzleException
     */
    public function insertPasswords(InsertPasswordsRequest $request): InsertPasswordsResponse
    {
        $response = new InsertPasswordsResponse();
        $this->sendRequest($request, $response);

        return $response;
    }

    /**
     * Will call the PMS-IO to insert passwords groups
     *
     * @param InsertPasswordsGroupsRequest $request
     * @return InsertPasswordsGroupsResponse
     * @throws GuzzleException
     */
    public function insertPasswordsGroups(InsertPasswordsGroupsRequest $request): InsertPasswordsGroupsResponse
    {
        $response = new InsertPasswordsGroupsResponse();
        $this->sendRequest($request, $response);

        return $response;
    }

    /**
     * Will call the PMS-IO to insert notes
     *
     * @param InsertNotesRequest $request
     * @return InsertNotesResponse
     * @throws GuzzleException
     */
    public function insertNotes(InsertNotesRequest $request): InsertNotesResponse
    {
        $response = new InsertNotesResponse();
        $this->sendRequest($request, $response);

        return $response;
    }

    /**
     * Will call the PMS-IO to insert notes categories
     *
     * @param InsertNotesCategoriesRequest $request
     * @return InsertNotesCategoriesResponse
     * @throws GuzzleException
     */
    public function insertNotesCategories(InsertNotesCategoriesRequest $request): InsertNotesCategoriesResponse
    {
        $response = new InsertNotesCategoriesResponse();
        $this->sendRequest($request, $response);

        return $response;
    }

    /**
     * Performs base request for any type of request and returns base response
     *
     * @param BaseRequest $baseRequest
     * @param BaseResponse $baseResponse
     * @return BaseResponse
     * @throws GuzzleException
     */
    private function sendRequest(BaseRequest $baseRequest, BaseResponse $baseResponse): BaseResponse
    {
        try{
            $baseRequest->setLogin($this->login);
            $baseRequest->setPassword($this->password);

            $this->logCalledApiMethod($baseRequest);
            {
                $absoluteCalledUrl = $this->buildAbsoluteCalledUrlForRequest($baseRequest);
                $guzzleResponse    = $this->guzzleHttpService->sendPostRequest($absoluteCalledUrl, $baseRequest->toArray());

                $baseResponse->prefillBaseFieldsFromJsonString($guzzleResponse);
            }
            $this->logResponse($baseResponse);
        }catch(Exception | TypeError $e){
            $this->logThrowable($e);
            return $baseResponse->prefillInternalBridgeError();
        }

        return $baseResponse;
    }

    /**
     * Will return the absolute url to be called by guzzle
     *
     * @param BaseRequest $request
     * @return string
     */
    private function buildAbsoluteCalledUrlForRequest(BaseRequest $request): string
    {
        if( substr($this->baseUrl, -1) === DIRECTORY_SEPARATOR ){
            $this->baseUrl = substr($this->baseUrl, 0, strlen($this->baseUrl) -1);
        }

        return $this->baseUrl . $request->getRequestUri();
    }

    /**
     * @param Throwable $e
     */
    private function logThrowable(Throwable $e): void
    {

        $this->logger->critical("Exception was thrown", [
            "message" => $e->getMessage(),
            "code"    => $e->getCode(),
            "trace"   => $e->getTraceAsString(),
        ]);
    }

    /**
     * Will log information about current api call
     *
     * @param BaseRequest $request
     */
    private function logCalledApiMethod(BaseRequest $request): void
    {
        $this->logger->info("Now calling api: ", [
            "calledMethod"  => debug_backtrace()[1]['function'], // need to use backtrace to get the correct calling method
            "baseUrl"       => $this->baseUrl,
            "requestUri"    => $request->getRequestUri(),
            "dataBag"       => $request->toArray(),
        ]);
    }

    /**
     * Will log the response data
     *
     * @param BaseResponse $response
     */
    private function logResponse(BaseResponse $response): void
    {
        $this->logger->info("Got response from called endpoint", [
            "response" => $response->toJson(),
        ]);
    }

}