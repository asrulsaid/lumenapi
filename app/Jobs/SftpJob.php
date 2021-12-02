<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Storage;
use Exception;

class SftpJob extends Job
{
    /** cara penggunaan
    *   dispatch(new SftpJob('dicoba/dicoba.txt',json_encode(array)));
    *   dispatch(new SftpJob('dicoba/dicoba.txt',String));
    */
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $path;
    protected $data;
    protected $root;

    public function __construct($path,$data)
    {
        $this->path    = $path;
        $this->data    = $data;
        $this->root     = env('SFTP_DESTINATION_PATH');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Storage::disk('sftp-remote')->append("{$this->root}/{$this->path}",$this->data);
        } catch (\Exception $e) {
            Storage::disk('sftp-remote')->append("{$this->root}/error_log.txt",$e->getMessage());
        }
    }
}
