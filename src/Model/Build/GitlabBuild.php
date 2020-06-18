<?php

namespace PHPCensor\Model\Build;

/**
 * Gitlab Build Model
 *
 * @author André Cianfarani <a.cianfarani@c2is.fr>
 */
class GitlabBuild extends GitBuild
{
    /**
     * Get link to commit from another source (i.e. Github)
     *
     * @return string
     */
    public function getCommitLink()
    {
        $domain = $this->getProject()->getAccessInformationItem('domain');
        return '//' . $domain . '/' . $this->getProject()->getReference() . '/commit/' . $this->getCommitId();
    }

    /**
     * Get link to branch from another source (i.e. Github)
     *
     * @return string
     */
    public function getBranchLink()
    {
        $domain = $this->getProject()->getAccessInformationItem('domain');
        return '//' . $domain . '/' . $this->getProject()->getReference() . '/tree/' . $this->getBranch();
    }

    /**
     * Get link to specific file (and line) in a the repo's branch
     *
     * @return string|null
     */
    public function getFileLinkTemplate()
    {
        return sprintf(
            '//%s/%s/blob/%s/{FILE}#L{LINE}',
            $this->getProject()->getAccessInformationItem('domain'),
            $this->getProject()->getReference(),
            $this->getCommitId()
        );
    }

    /**
    * Get the URL to be used to clone this remote repository.
    */
    protected function getCloneUrl()
    {
        $key = trim($this->getProject()->getSshPrivateKey());

        $user   = $this->getProject()->getAccessInformationItem('user');
        $domain = $this->getProject()->getAccessInformationItem('domain');
        $port   = $this->getProject()->getAccessInformationItem('port');

        if (!empty($key)) {
            $url =  'ssh://' . $user . '@' . $domain;
        } else {
            $url = 'https://' . $domain;
        }

        if (!empty($port)) {
            $url .= ':' . $port;
        }

        return $url . '/' . $this->getProject()->getReference() . '.git';
    }
}
