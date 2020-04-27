<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Other;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 查询工单列表s.
     *
     * @param $start_time
     * @param $end_time
     *
     * @return array
     */
    public function feedbacks($start_time, $end_time)
    {
        $query = [
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        return $this->httpGet('feedbacks', $query);
    }

    /**
     * 添加工单评论.
     *
     * @param $dialog_id
     * @param $content
     *
     * @return array
     */
    public function comment($dialog_id, $content)
    {
        $params = [
            'content' => $content,
        ];

        return $this->httpPostJson("feedbacks/{$dialog_id}", $params);
    }

    /**
     * 生成开放网关连接配置.
     *
     * @param $uid
     * @param $type
     * @param $unique_id
     *
     * @return array
     */
    public function openIotHub($uid, $type, $unique_id)
    {
        $params = [
            'uid' => $uid,
            'type' => $type,
            'unique_id' => $unique_id,
        ];

        return $this->httpPostJson('open-iot-hub/access/config', $params);
    }
}
