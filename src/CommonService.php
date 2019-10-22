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
    private static $serviceProductId;

    public function __construct($baseInfo)
    {
        parent::__construct();
        self::$jsonSchema = json_decode(file_get_contents(__DIR__ . '/../config/validationSchema.json'), true);
        $this->header = [
            '_token_issuer_'    =>  $baseInfo->getTokenIssuer(),
            '_token_'           => $baseInfo->getToken()
        ];
        self::$commonServiceApi = require __DIR__ . '/../config/apiConfig.php';
        self::$serviceProductId = require __DIR__ . '/../config/serviceProductId.php';
    }

    public function getGuildList($params){
        $apiName = 'getGuildList';
        $header = $this->header;
        $optionHasArray = true;

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

        # prepare params to send
        # set service call product Id
        $option['query']['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option['query'];
            $optionHasArray = true;
            unset($option['query']);
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );

    }

    public function getCurrencyList($params){
        $apiName = 'getCurrencyList';
        $header = $this->header;
        $optionHasArray = false;
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

        # prepare params to send
        # set service call product Id
        $option['query']['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option['query'];
            $optionHasArray = true;
            unset($option['query']);
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );
    }

    public function getOtt($params) {
        $apiName = 'getOtt';
        $optionHasArray = false;
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

        # prepare params to send
        # set service call product Id
        $option['query']['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option['query'];
            $optionHasArray = true;
            unset($option['query']);
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );
    }
    
    public function addTagTreeCategory($params) {
        $apiName = 'addTagTreeCategory';
        $optionHasArray = false;
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
        $method = self::$commonServiceApi[$apiName]['method'];
        $paramKey = $method == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        # prepare params to send
        # set service call product Id
        $option[$paramKey]['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option[$paramKey];
            $optionHasArray = true;
            unset($option[$paramKey]);
            $method = 'GET';
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            $method,
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );
    }

    public function getTagTreeCategoryList($params) {
        $apiName = 'getTagTreeCategoryList';
        $optionHasArray = false;
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
        # prepare params to send
        # set service call product Id
        $option[$paramKey]['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option[$paramKey];
            $optionHasArray = true;
            unset($option[$paramKey]);
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );
    }

    public function updateTagTreeCategory($params) {
        $apiName = 'updateTagTreeCategory';
        $optionHasArray = false;
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

        $method = self::$commonServiceApi[$apiName]['method'];
        $paramKey = $method == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        # prepare params to send
        # set service call product Id
        $option[$paramKey]['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option[$paramKey];
            $optionHasArray = true;
            unset($option[$paramKey]);
            $method = 'GET';
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            $method,
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );
    }

    public function addTagTree($params) {
        $apiName = 'addTagTree';
        $optionHasArray = false;
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

        $method = self::$commonServiceApi[$apiName]['method'];
        $paramKey = $method == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        # prepare params to send
        # set service call product Id
        $option[$paramKey]['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option[$paramKey];
            $optionHasArray = true;
            unset($option[$paramKey]);
            $method = 'GET';
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            $method,
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );
    }

    public function getTagTreeList($params) {
        $apiName = 'getTagTreeList';
        array_walk_recursive($params, 'self::prepareData');
        $optionHasArray = false;
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
        # prepare params to send
        # set service call product Id
        $option[$paramKey]['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option[$paramKey];
            $optionHasArray = true;
            unset($option[$paramKey]);
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            self::$commonServiceApi[$apiName]['method'],
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );
    }

    public function updateTagTree($params) {
        $apiName = 'updateTagTree';
        $optionHasArray = false;
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

        $method = self::$commonServiceApi[$apiName]['method'];
        $paramKey = $method == 'GET' ? 'query' : 'form_params';

        $option = [
            'headers' => $header,
            $paramKey => $params,
        ];

        self::validateOption($apiName, $option, $paramKey);
        # prepare params to send
        # set service call product Id
        $option[$paramKey]['scProductId'] = self::$serviceProductId[$apiName];

        if (isset($params['scVoucherHash'])) {
            $option['withoutBracketParams'] =  $option[$paramKey];
            $optionHasArray = true;
            unset($option[$paramKey]);
            $method = 'GET';
        }

        return ApiRequestHandler::Request(
            self::$config[self::$serverType][self::$commonServiceApi[$apiName]['baseUri']],
            $method,
            self::$commonServiceApi[$apiName]['subUri'],
            $option,
            false,
            $optionHasArray
        );
    }
}