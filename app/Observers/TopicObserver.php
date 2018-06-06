<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body, 'user_topic_body'); /*XSS 安全漏洞*/
        $topic->excerpt = make_excerpt($topic->body);   /*提取文章摘要*/
    }
}
