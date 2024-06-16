<?php
/**
 * MessageCategory
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  ElasticEmail
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Elastic Email REST API
 *
 * This API is based on the REST API architecture, allowing the user to easily manage their data with this resource-based approach.    Every API call is established on which specific request type (GET, POST, PUT, DELETE) will be used.    The API has a limit of 20 concurrent connections and a hard timeout of 600 seconds per request.    To start using this API, you will need your Access Token (available <a target=\"_blank\" href=\"https://app.elasticemail.com/marketing/settings/new/manage-api\">here</a>). Remember to keep it safe. Required access levels are listed in the given request’s description.    Downloadable library clients can be found in our Github repository <a target=\"_blank\" href=\"https://github.com/ElasticEmail?tab=repositories&q=%22rest+api%22+in%3Areadme\">here</a>
 *
 * The version of the OpenAPI document: 4.0.0
 * Contact: support@elasticemail.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace ElasticEmail\Model;
use \ElasticEmail\ObjectSerializer;

/**
 * MessageCategory Class Doc Comment
 *
 * @category Class
 * @package  ElasticEmail
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MessageCategory
{
    /**
     * Possible values of this enum
     */
    public const UNKNOWN = 'Unknown';

    public const IGNORE = 'Ignore';

    public const SPAM = 'Spam';

    public const BLACK_LISTED = 'BlackListed';

    public const NO_MAILBOX = 'NoMailbox';

    public const GREY_LISTED = 'GreyListed';

    public const THROTTLED = 'Throttled';

    public const TIMEOUT = 'Timeout';

    public const CONNECTION_PROBLEM = 'ConnectionProblem';

    public const SPF_PROBLEM = 'SPFProblem';

    public const ACCOUNT_PROBLEM = 'AccountProblem';

    public const DNS_PROBLEM = 'DNSProblem';

    public const NOT_DELIVERED_CANCELLED = 'NotDeliveredCancelled';

    public const CODE_ERROR = 'CodeError';

    public const MANUAL_CANCEL = 'ManualCancel';

    public const CONNECTION_TERMINATED = 'ConnectionTerminated';

    public const NOT_DELIVERED = 'NotDelivered';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::UNKNOWN,
            self::IGNORE,
            self::SPAM,
            self::BLACK_LISTED,
            self::NO_MAILBOX,
            self::GREY_LISTED,
            self::THROTTLED,
            self::TIMEOUT,
            self::CONNECTION_PROBLEM,
            self::SPF_PROBLEM,
            self::ACCOUNT_PROBLEM,
            self::DNS_PROBLEM,
            self::NOT_DELIVERED_CANCELLED,
            self::CODE_ERROR,
            self::MANUAL_CANCEL,
            self::CONNECTION_TERMINATED,
            self::NOT_DELIVERED
        ];
    }
}


