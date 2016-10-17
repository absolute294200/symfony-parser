<?php
/*
 * This file is part of the feed-io package.
 *
 * (c) Alexandre Debril <alex.debril@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FeedIo\Adapter\FileSystem;

class ClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \FeedIo\Adapter\FileSystem\Client
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Client();
    }

    public function testGetResponse()
    {
        $response = $this->object->getResponse(
            __DIR__.'/../../../samples/sample-atom.xml',
            new \DateTime()
        );
        $this->assertInstanceOf('\FeedIo\Adapter\ResponseInterface', $response);

        $this->assertEquals(file_get_contents(__DIR__.'/../../../samples/sample-atom.xml'), $response->getBody());

        $this->assertEquals(array(), $response->getHeaders());
        $this->assertEquals('', $response->getHeader('name'));
        $this->assertInstanceOf('\DateTime', $response->getLastModified());
    }

    /**
     * @expectedException \FeedIo\Adapter\NotFoundException
     */
    public function testGetNotFound()
    {
        $client = new Client();
        $client->getResponse('/opt/nowhere.xml', new \DateTime());
    }
}
