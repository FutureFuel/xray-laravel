<?php

declare(strict_types=1);

namespace Futurefuel\Xray\Submission;

use Pkerrigan\Xray\Segment;
use Pkerrigan\Xray\Submission\DaemonSegmentSubmitter as SubmissionDaemonSegmentSubmitter;
use Pkerrigan\Xray\Submission\SegmentSubmitter;

class DaemonSegmentSubmitter implements SegmentSubmitter
{
    /**
     * @var SubmissionDaemonSegmentSubmitter
     */
    private $submitter;

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    public function __construct()
    {
        $this->host = config('xray.daemon_xray_host', '127.0.0.1');
        $this->port = (int) config('xray.daemon_xray_port', 2000);
    }

    /**
     * Get or create the Daemon submitter.
     *
     * @return SubmissionDaemonSegmentSubmitter
     */
    protected function submitter(): SubmissionDaemonSegmentSubmitter
    {
        if (is_null($this->submitter)) {
            $this->submitter = new SubmissionDaemonSegmentSubmitter(
                $this->host,
                $this->port
            );
        }

        return $this->submitter;
    }

    /**
     * @param Segment $segment
     * @return void
     */
    public function submitSegment(Segment $segment)
    {
        $this->submitter()->submitSegment($segment);
    }
}
