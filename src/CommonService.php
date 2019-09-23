<?php
/**
 * Created by PhpStorm.
 * User: keshtgar
 * Date: 8/11/19
 * Time: 12:33 PM
 */
namespace Pod\Common\Service;

use Pod\Base\Service\BaseService;
use Pod\Base\Service\ApiRequestHandler;


class CommonService extends BaseService
{
    private $header;
    private static $commonServiceApi;

    public function __construct($baseInfo)
    {
        parent::__construct();
        self::$jsonSchema = json_decode(file_get_contents(__DIR__. '/../jsonSchema.json'), true);
        $this->header = [
            '_token_issuer_'    =>  $baseInfo->getTokenIssuer(),
            '_token_'           => $baseInfo->getToken()
        ];
        self::$commonServiceApi = require __DIR__ . '/../config/apiConfig.php';
    }

    public function getGuildList($params){
        $apiName = 'getGuildList';
        $header = $this->header;
        if(isset($params['token'])){
            $header['_token_'] = $params['token'];
            unset($params['token']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $option = [
            'headers' =>  $header,
            'query' => $params,
        ];

        self::validateOption($apiName, $option);

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );

    }

    public function getCurrencyList($params){
        $apiName = 'getCurrencyList';

        $header = $this->header;
        if(isset($params['token'])){
            $header['_token_'] = $params['token'];
            unset($params['token']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $option = [
            'headers' =>  $header,
            'query' => [],
        ];

        self::validateOption($apiName, $option);

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );
    }

    public function getOtt($params) {
        $apiName = 'getOtt';

        $header = $this->header;
        if(isset($params['token'])){
            $header['_token_'] = $params['token'];
            unset($params['token']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $option = [
            'headers' =>  $header,
            'query' => [],
        ];

        self::validateOption($apiName, $option);

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );
    }
    
    public function addTagTreeCategory($params) {
        $apiName = 'addTagTreeCategory';
        array_walk_recursive($params, 'self::prepareData');

        $header = $this->header;
        if(isset($params['apiToken'])){
            $header['_token_'] = $params['apiToken'];
            unset($params['apiToken']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $paramKey = self::$commonServiceApi[$apiName]['method'] == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );
    }

    public function getTagTreeCategoryList($params) {
        $apiName = 'getTagTreeCategoryList';
        array_walk_recursive($params, 'self::prepareData');

        $header = $this->header;

        if(isset($params['apiToken'])){
            $header['_token_'] = $params['apiToken'];
            unset($params['apiToken']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $paramKey = self::$commonServiceApi[$apiName]['method'] == 'GET' ? 'query' : 'form_params';


        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );
    }

    public function updateTagTreeCategory($params) {
        $apiName = 'updateTagTreeCategory';
        array_walk_recursive($params, 'self::prepareData');

        $header = $this->header;
        if(isset($params['apiToken'])){
            $header['_token_'] = $params['apiToken'];
            unset($params['apiToken']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $paramKey = self::$commonServiceApi[$apiName]['method'] == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );
    }

    public function addTagTree($params) {
        $apiName = 'addTagTree';
        array_walk_recursive($params, 'self::prepareData');

        $header = $this->header;
        if(isset($params['apiToken'])){
            $header['_token_'] = $params['apiToken'];
            unset($params['apiToken']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $paramKey = self::$commonServiceApi[$apiName]['method'] == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );
    }

    public function getTagTreeList($params) {
        $apiName = 'getTagTreeList';
        array_walk_recursive($params, 'self::prepareData');

        $header = $this->header;
        if(isset($params['apiToken'])){
            $header['_token_'] = $params['apiToken'];
            unset($params['apiToken']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $paramKey = self::$commonServiceApi[$apiName]['method'] == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );
    }

    public function updateTagTree($params) {
        $apiName = 'updateTagTree';
        array_walk_recursive($params, 'self::prepareData');

        $header = $this->header;
        if(isset($params['apiToken'])){
            $header['_token_'] = $params['apiToken'];
            unset($params['apiToken']);
        }
        if(isset($params['_token_issuer_'])){
            $header['_token_issuer_'] = $params['_token_issuer_'];
            unset($params['_token_issuer_']);
        }

        $paramKey = self::$commonServiceApi[$apiName]['method'] == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option
        );
    }
}