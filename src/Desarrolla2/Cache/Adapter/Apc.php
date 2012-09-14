<?php

/**
 * This file is part of the D2Cache proyect.
 * 
 * Description of Apc
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : Apc.php , UTF-8
 * @date : Sep 4, 2012 , 1:00:27 AM
 */
use Desarrolla2\Cache\Adapter\AdapterInterface;
use Desarrolla2\Cache\Exception\ApcCacheException;

class Apc implements AdapterInterface
{

    /**
     * @var int
     */
    protected $ttl;

    /**
     * {@inheritdoc } 
     */
    public function delete($key)
    {
        if ($this->exists($key)) {
            if (!apc_delete(strtolower($key))) {
                throw new ApcCacheException('Error deleting data with the key ' . $key . ' from the APC cache.');
            }
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc } 
     */
    public function get($key)
    {
        if ($this->exists($key)) {
            if (!$data = apc_fetch(strtolower($key))) {
                throw new ApcCacheException('Error fetching data with the key ' . $key . ' from the APC cache.');
            }
            return $data;
        }
        return null;
    }

    /**
     * {@inheritdoc } 
     */
    public function has($key)
    {
        return (boolean) apc_exists(strtolower($key));
    }

    /**
     * {@inheritdoc } 
     */
    public function set($key, $value, $ttl = null)
    {
        if (!apc_store(strtolower($key), $data)) {
            throw new ApcCacheException('Error saving data with the key ' . $key . ' to the APC cache.');
        }
    }

    /**
     * {@inheritdoc } 
     */
    public function setDefaultTtl($ttl)
    {
        $this->ttl = $ttl;
    }

}
