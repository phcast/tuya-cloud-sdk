<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Scene;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;
use Phpcast\TuyaCloudSdk\Kernel\Transform\Conditions;
use Phpcast\TuyaCloudSdk\Kernel\Transform\DeviceAction;
use Phpcast\TuyaCloudSdk\Kernel\Transform\PreConditions;
use Phpcast\TuyaCloudSdk\Kernel\Transform\ExternalAction;

class Client extends BaseClient
{
    /**
     * 查询家庭下的场景列表.
     *
     * @param $home_id
     *
     * @return array
     */
    public function list($home_id)
    {
        return $this->httpGet("homes/{$home_id}/scenes");
    }

    /**
     * 查询默认场景图⽚列表.
     *
     * @return array
     */
    public function defaultPictures()
    {
        return $this->httpGet('scenes/default-pictures');
    }

    /**
     * 触发场景.
     *
     * @param $home_id
     * @param $scene_id
     *
     * @return array
     */
    public function trigger($home_id, $scene_id)
    {
        return $this->httpPost("homes/{$home_id}/scenes/{$scene_id}/trigger");
    }

    /**
     * 删除场景.
     *
     * @param $home_id
     * @param $scene_id
     *
     * @return array
     */
    public function delete($home_id, $scene_id)
    {
        return $this->httpDelete("homes/{$home_id}/scenes/{$scene_id}");
    }

    /**
     * 添加场景.
     *
     * @param $home_id
     * @param $name
     * @param $background
     * @param $executor_property
     * @param $action_executor
     * @param $entity_id
     *
     * @return array
     */
    public function create($home_id, $name, $background, array $executor_property, $action_executor, $entity_id)
    {
        $params = [
            'name' => $name,
            'background' => $background,
            'actions' => [
                'executor_property' => $executor_property,
                'action_executor' => $action_executor,
                'entity_id' => $entity_id,
            ],
        ];

        return $this->httpPostJson("homes/{$home_id}/scenes", $params);
    }

    /**
     * 修改场景.
     *
     * @param       $home_id
     * @param       $scene_id
     * @param       $name
     * @param       $background
     * @param array $executor_property
     * @param       $action_executor
     * @param       $entity_id
     *
     * @return array
     */
    public function update($home_id, $scene_id, $name, $background, array $executor_property, $action_executor, $entity_id)
    {
        $params = [
            'name' => $name,
            'background' => $background,
            'actions' => [
                'executor_property' => $executor_property,
                'action_executor' => $action_executor,
                'entity_id' => $entity_id,
            ],
        ];

        return $this->httpPut("homes/{$home_id}/scenes/{$scene_id}", [], $params);
    }

    /**
     * 查询家庭下支持场景的设备列表.
     *
     * @author zenglin
     *
     * @param $home_id
     *
     * @return array
     */
    public function devices($home_id)
    {
        return $this->httpGet("homes/{$home_id}/scene/devices");
    }

    /**
     * 场景绑定.
     *
     * @param $device_id
     * @param $scene_id
     * @param $code
     * @param $value
     *
     * @return array
     */
    public function deviceBindScene($device_id, $scene_id, $code, $value)
    {
        $params = [
            'code' => $code,
            'value' => $value,
        ];

        return $this->httpPostJson("devices/{$device_id}/scenes/{$scene_id}", $params);
    }

    /**
     * 场景解绑.
     *
     * @param $device_id
     * @param $scene_id
     *
     * @return array
     */
    public function deletedeviceBindScene($device_id, $scene_id)
    {
        return $this->httpDelete("devices/{$device_id}/scenes/{$scene_id}");
    }

    /**
     * 查询设备已绑定的场景列表.
     *
     * @param $device_id
     *
     * @return array
     */
    public function findDeviceScenes($device_id)
    {
        return $this->httpGet("devices/{$device_id}/scenes");
    }

    /**
     * 添加自动化.
     *
     * @param string                            $home_id
     * @param string                            $name
     * @param string                            $background
     * @param Conditions|array                  $conditions
     * @param DeviceAction|ExternalAction|array $actions
     * @param $match_type
     * @param PreConditions|null $preconditions
     * @param string|null        $condition_rule
     *
     * @return array
     */
    public function createAutomations($home_id, $name, $background, $conditions, $actions, $match_type, $preconditions = null, $condition_rule = null)
    {
        $params = [
            'name' => $name,
            'background' => $background,
            'conditions' => $this->getConditions($conditions),
            'preconditions' => $this->getPreconditions($preconditions),
            'actions' => $this->getActions($actions),
            'match_type' => $match_type,
            'condition_rule' => $condition_rule,
        ];

        return $this->httpPostJson("homes/{$home_id}/automations", $params);
    }

    /**
     * @param $conditions
     *
     * @return array
     */
    protected function getConditions($conditions)
    {
        if ($conditions instanceof Conditions) {
            return $conditions->transformForRequest();
        }

        return $conditions;
    }

    /**
     * @param $preconditions
     *
     * @return array
     */
    protected function getPreconditions($preconditions)
    {
        if ($preconditions instanceof PreConditions) {
            return $preconditions->transformForRequest();
        }

        return $preconditions;
    }

    /**
     * @param $actions
     *
     * @return array
     */
    protected function getActions($actions)
    {
        if ($actions instanceof DeviceAction || $actions instanceof ExternalAction) {
            return $actions->transformForRequest();
        }

        return $actions;
    }

    /**
     * 修改自动化.
     *
     * @param      $home_id
     * @param      $automation_id
     * @param      $name
     * @param      $background
     * @param      $conditions
     * @param      $actions
     * @param      $match_type
     * @param null $preconditions
     * @param null $condition_rule
     *
     * @return array
     */
    public function updateAutomations($home_id, $automation_id, $name, $background, $conditions, $actions, $match_type, $preconditions = null, $condition_rule = null)
    {
        $params = [
            'name' => $name,
            'background' => $background,
            'conditions' => $this->getConditions($conditions),
            'preconditions' => $this->getPreconditions($preconditions),
            'actions' => $this->getActions($actions),
            'match_type' => $match_type,
            'condition_rule' => $condition_rule,
        ];

        return $this->httpPut("homes/{$home_id}/automations/{$automation_id}", [], $params);
    }

    /**
     * 删除自动化.
     *
     * @param $home_id
     * @param $automation_id
     *
     * @return array
     */
    public function deleteAutomations($home_id, $automation_id)
    {
        return $this->httpDelete("homes/{$home_id}/automations/{$automation_id}");
    }

    /**
     * 查询家庭下的自动化列表.
     *
     * @param $home_id
     *
     * @return array
     */
    public function homeAutomationsList($home_id)
    {
        return $this->httpGet("homes/{$home_id}/automations");
    }

    /**
     * 查询家庭下的某个自动化.
     *
     * @param $home_id
     * @param $automation_id
     *
     * @return array
     */
    public function findHomeAutomations($home_id, $automation_id)
    {
        return $this->httpGet("homes/{$home_id}/automations/{$automation_id}");
    }

    /**
     * 触发自动化外部条件.
     *
     * @param $home_id
     * @param $automation_id
     * @param $conditions
     *
     * @return array
     */
    public function homeAutomationsTrigger($home_id, $automation_id, $conditions)
    {
        $parmas = [
            'conditions' => $this->getConditions($conditions),
        ];

        return $this->httpPostJson("homes/{$home_id}/automations/{$automation_id}/trigger", $parmas);
    }

    /**
     * 查询家庭下支持自动化的设备列表.
     *
     * @param $home_id
     *
     * @return array
     */
    public function homesAutomationDevices($home_id, $type)
    {
        $query = [
            'type' => $type,
        ];

        return $this->httpGet("homes/{$home_id}/automation/devices", $query);
    }

    /**
     * 查询自动化支持的天气条件.
     *
     * @return array
     */
    public function weatherConditions()
    {
        return $this->httpGet('homes/automation/weather/conditions');
    }

    /**
     * 获取家庭支持的联动条件.
     *
     * @param $home_id
     *
     * @return array
     */
    public function enableLinkageCode($home_id)
    {
        return $this->httpGet("devices/$home_id/enable-linkage/codes");
    }

    /**
     * 获取设备支持的联动条件.
     *
     * @param $device_id
     *
     * @return array
     */
    public function enableLinkageSpecification($device_id)
    {
        return $this->httpGet("devices/{$device_id}/enable-linkage/specification");
    }
}
