<?php

namespace Bittacora\MediaIntegrations;

use Bittacora\MediaIntegrations\Models\MediaIntegration;

class MediaIntegrations
{
    /**
     * Obtener todas las integraciones de un modelo
     *
     * @param $model
     * @return mixed
     */
    public function getIntegrationsToModel($model): mixed
    {
        $integrations = MediaIntegration::where('integratable_type', $model::class)->where('integratable_id', $model->id)->orderBy('order_column')->get();
        foreach ($integrations as $integration){
            $integration->integration_id = $this->getIdOnIntegrations($integration);
        }
        return $integrations;
    }

    /**
     * Obtener las integraciones de un modelo por tipo
     *
     * @param $model
     * @param $type
     * @param $limit
     * @return mixed
     */
    public function getIntegrationsByType($model,$type = 'youtube', $limit = null): mixed
    {
        if ($limit === null){
            $integrations = MediaIntegration::where('integratable_type', $model::class)->where('integratable_id', $model->id)->where('type',$type)->orderBy('order_column')->get();
        }else{
            $integrations = MediaIntegration::where('integratable_type', $model::class)->where('integratable_id', $model->id)->where('type',$type)
                ->orderBy('order_column')->take($limit)->get();
        }
        foreach ($integrations as $integration){
            $integration->integration_id = $this->getIdOnIntegrations($integration);
        }
        return $integrations;
    }

    /**
     * Para obtener las integraciones de un modelo de youtube y vimeo
     *
     * @param $model
     * @param $limit
     * @return mixed
     */
    public function getVideosOnModel($model, $limit = null): mixed
    {
        if ($limit === null){
            $integrations = MediaIntegration::where('integratable_type', $model::class)->where('integratable_id', $model->id)
                ->where('type', 'youtube')->orWhere('type', 'vimeo')
                ->orderBy('order_column')->get();
        }else{
            $integrations = MediaIntegration::where('integratable_type', $model::class)->where('integratable_id', $model->id)
                ->where('type', 'youtube')->orWhere('type', 'vimeo')
                ->orderBy('order_column')->take($limit)->get();
        }
        foreach ($integrations as $integration){
            $integration->integration_id = $this->getIdOnIntegrations($integration);
        }
        return $integrations;
    }

    /**
     * Para obtener las integraciones de un modelo de las publicaciones de RRSS
     *
     * @param $model
     * @param $limit
     * @return mixed
     */
    public function getPostsOnModel($model, $limit = null): mixed
    {
        if ($limit === null){
            $integrations = MediaIntegration::where('integratable_type', $model::class)->where('integratable_id', $model->id)
                ->where('type', 'x')->orWhere('type', 'facebook')->orWhere('type', 'instagram')->orWhere('type', 'tiktok')
                ->orderBy('order_column')->get();
        }else{
            $integrations = MediaIntegration::where('integratable_type', $model::class)->where('integratable_id', $model->id)
                ->where('type', 'x')->orWhere('type', 'facebook')->orWhere('type', 'instagram')->orWhere('type', 'tiktok')
                ->orderBy('order_column')->take($limit)->get();
        }
        foreach ($integrations as $integration){
            $integration->integration_id = $this->getIdOnIntegrations($integration);
        }
        return $integrations;
    }

    /**
     * Obtener id de las integraciones
     *
     * @param $model
     * @return false|string
     */
    private function getIdOnIntegrations($model): bool|string
    {
        switch ($model->type){
            case "youtube":
                $idIntegration = $this->getYoutubeId($model->url);
                break;
            case "vimeo":
                $idIntegration = $this->getVimeoId($model->url);
                break;
            case "tiktok":
                $idIntegration = $this->getTikTokId($model->url);
                break;
            default:
                $idIntegration = '';
        }
        return $idIntegration;
    }

    /**
     * Obtener id de la integración de YouTube
     *
     * @param $url
     * @return false|string
     */
    private function getYoutubeId($url): bool|string
    {
        if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/[^\n\s]+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }
        return false;
    }

    /**
     * Obtener id de la integración de Vimeo
     *
     * @param $url
     * @return false|string
     */
    private function getVimeoId($url): bool|string
    {
        if (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
            return $matches[1];
        }
        return false;
    }

    /**
     * Obtener id de la integración de Tiktok
     *
     * @param $url
     * @return false|string
     */
    private function getTikTokId($url): bool|string
    {
        if (preg_match('/tiktok\.com\/@[a-zA-Z0-9_]+\/video\/(\d+)/', $url, $matches)) {
            return $matches[1];
        }
        return false;
    }
}
