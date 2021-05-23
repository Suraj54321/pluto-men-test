<?php

namespace App\Helper;

class ApiResponseFormater{

    public function __formatResponse($data, $message = 'SUCCESS', $code = 200) {
        $response = [];

        if (!empty($data)) {
            /* Replace NULL with empty strings ""*/
            /*Level 1*/
            foreach ($data as $key => $value) {
                if (!is_array($value)) {
                    if (empty($value)) {
                        $data[$key] = $this->checkNull($value);
                    }
                } elseif (is_array($value)) {
                    /*Level 2*/
                    foreach ($value as $subkey => $subvalue) {
                        if (!is_array($subvalue)) {
                            if (empty($subvalue)) {
                                $data[$key][$subkey] = $this->checkNull($subvalue);
                            }
                        } elseif (is_array($subvalue)) {
                            /*Level 3*/
                            foreach ($subvalue as $subkey2 => $subvalue2) {
                                if (empty($subvalue2)) {
                                    //$data[$key][$subkey][$subkey2] = $this->checkNull($subvalue2);
                                }
                            }
                        }
                    }
                }
            }

            $response['data'] = $data;
            
        }else{
            
            /*Pass data to this method based on original response types*/
            if(is_array($data)){
                $response['data'] = [];    
            }else{
                $response['data'] = (object) null;
            }
            
        }

        $response['message'] = $message;
        $response['status'] = $code;
        
        return response()->json($response);
    }


    /**
     * Format validation response
     * @param string datetime
     * @param string timezone offset
     * @return string datetime
     */
    public function __formatValidationResponse($v_messages,$data) {
        
        $v_messages = reset($v_messages);
        
        $responseText = $v_messages[0];
        
        $response = [];

        if(is_array($data)){
            $response['data'] = [];    
        }else{
            $response['data'] = (object) null;
        }

        $response['message'] = $responseText;
        $response['status'] = 500;
        
        return response()->json($response);
    }

    /**
     * Append Pagination Params in Response
     * @param string datetime
     * @param string timezone offset
     * @return string datetime
     */
    public function __appendPaginationResponse($paginateObj, $data) {
        $result = [];
        $result['data'] = $data['data'];
        $result['current_page'] = $paginateObj->currentPage();
        $result['per_page'] = $paginateObj->perPage();
        $result['total'] = $paginateObj->total();

        /* "first_page_url": "http://localhost/waspito/public/api/specialities?page=1",
                "from": 1,
                "last_page": 1,
                "last_page_url": "http://localhost/waspito/public/api/specialities?page=1",
                "next_page_url": null,
                "path": "http://localhost/waspito/public/api/specialities",
                "per_page": 10,
                "prev_page_url": null,
                "to": 5,
                "total": 5*/

        return $result;
    }

    /* replace null and empty value with blank
        * @input string|int value
        * @output value
    */

    private function checkNull($value) {
        
        return ((empty($value) || is_null($value)) && $value !== 0) ? "" : $value;
    }

    /**
     * Convert Date Time from UTC(GMT) to given timezone
     * @param string datetime
     * @param string timezone offset
     * @return string datetime
     */
    public function convertTimezone($date, $offset) {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date,'UTC');
        $date->setTimezone($offset);
        return $date->toDateTimeString();
    }

    public function __formatValidationResponseForSeperateClass($v_messages,$data){
        $v_messages = reset($v_messages);
        
        $responseText = $v_messages[0];
        
        $response = [];

        if(is_array($data)){
            $response['data'] = [];    
        }else{
            $response['data'] = (object) null;
        }

        $response['message'] = $responseText;
        $response['status'] = 500;
        
        return $response;
    }

}
