<?php

namespace BREND\AGV\Models;

class AGV_response{
    private $statusCode, $config = array();

    public function __construct($content){
        $this->statusCode = $content['StatusCode'];
        $this->config = $content['Config'];
    }

    public function toArray(){
        return ['StatusCode' => $this->statusCode, 'Config'=> $this->config];
    }

    public function getStatusCode(){
        return $this->statusCode;
    }

    public function getConfig(){
        return $this->config;
    }

    public function getBattery(){
        /*
            '電池電量'
        */
        if(isset($this->config['Battery'])){
            $data = $this->config['Battery'];
            $this->config = array();
            return $this->config['Battery'] = $data;
        }
        throw AGVException("Config['Battery'] is unSet", STATUS::JSON_NO_REQUIRED_DATA);
    }

    public function getPos(){
        /*
            'X' => 'AGV相對座標x'
            'Y' => 'AGV相對座標y'
            'A' => 'AGV相對座標a'
        */
        if(isset($this->config['Pos'])){
            $data = $this->config['Pos'];
            $this->config = array();
            return $this->config['Pos'] = $data;
        }
        throw AGVException("Config['Pos'] is unSet", STATUS::JSON_NO_REQUIRED_DATA);
    }

    public function getStatus(){
        /*
            State           String  AGV當前狀態
            IsJogSearch     Bool    是否啟用寸動搜尋模式
            IsLiftUp        Bool    轉盤是否已經頂升
            IsScriptCmd     Bool    腳本是否運行中
            IsScriptStart   Bool    腳本是否開始執行
            IsScriptFinish  Bool    腳本是否執行完成
            IsScriptPause   Bool    腳本是否暫停中
            IsScriptStop    Bool    腳本是否已經發生停止
            IsLaserStop     Bool    安全雷射是否觸發
            IsLaserEnable   Bool    安全雷射是否啟用
            IsEmergencyStop Bool    緊急停止按鈕是否觸發中
            IsChargeing     Bool    AGV是否充電中
            IsReady         Bool    AGV是否準備中
            IsMoving        Bool    AGV是否移動中
        */
        if(isset($this->config['Status'])){
            $data = $this->config['Status'];
            $this->config = array();
            return $this->config['Status'] = $data;
        }
        throw AGVException("Config['Status'] is unSet", STATUS::JSON_NO_REQUIRED_DATA);
    }

    public function getAttitude(){
        /*
            X       Double  二維碼X偏移量
            Y       Double  二維碼Y偏移量
            Yaw     Double  二維碼旋轉角度
            Code    String  二維碼內容
        */
        if(isset($this->config['Attitude'])){
            $data = $this->config['Attitude'];
            $this->config = array();
            return $this->config['Attitude'] = $data;
        }
        throw AGVException("Config['Attitude'] is unSet", STATUS::JSON_NO_REQUIRED_DATA);
    }

    public function getAgvLogIndex(){
        /*
            IsProgress  Bool    腳本是否運行中
            ScriptIdx   Int     目前執行的腳本行數
            RunIdx      Int     目前批次命令的行數
            ErrorIdx    Int     異常的錯誤碼
        */
        if(isset($this->config['AgvLogIndex'])){
            $data = $this->config['AgvLogIndex'];
            $this->config = array();
            return $this->config['AgvLogIndex'] = $data;
        }
        throw AGVException("Config['AgvLogIndex'] is unSet", STATUS::JSON_NO_REQUIRED_DATA);
    }

    public function getRunPara(){
        /*
            Speed Int 速度
            Acceleration Int 加速度
            Deceleration Int 減速度
            Jerk Int 加加速/減減速
        */
        if(isset($this->config['RunPara'])){
            $data = $this->config['RunPara'];
            $this->config = array();
            return $this->config['RunPara'] = $data;
        }
        throw AGVException("Config['RunPara'] is unSet", STATUS::JSON_NO_REQUIRED_DATA);
    }

    public function getAgvScript(){
        /*
            Type Int 指令類型
            Parameter Int 指令參數
            Code Int 指令碼
        */
        if(isset($this->config['AgvScript'])){
            $data = $this->config['AgvScript'];
            $this->config = array();
            return $this->config['AgvScript'] = $data;
        }
        throw AGVException("Config['AgvScript'] is unSet", STATUS::JSON_NO_REQUIRED_DATA);
    }
}