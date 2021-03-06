<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23/11/14
 * Time: 17:44
 */
namespace FeedIo;

use FeedIo\Feed\Item;
use FeedIo\Rule\DateTimeBuilder;
use FeedIo\Rule\Title;
use Psr\Log\NullLogger;

class FormatterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \FeedIo\Formatter
     */
    protected $object;

    protected function setUp()
    {
        $ruleSet = new RuleSet();
        $ruleSet->add(new Title());
        $document = new \DOMDocument();
        $document->loadXML('<channel><feed></feed></channel>');
        $standard = $this->getMockForAbstractClass(
            '\FeedIo\StandardAbstract',
            array(new DateTimeBuilder()),
            'StandardMock',
            true,
            true,
            true,
            ['format', 'getMainElement', 'setHeaders', 'buildFeedRuleSet', 'buildItemRuleSet']
        );
        $standard->expects($this->any())->method('format')->will($this->returnValue(
            $document
        ));
        $standard->expects($this->any())->method('getMainElement')->will($this->returnValue(
            $document->documentElement->firstChild
        ));
        $standard->expects($this->any())->method('setHeaders')->will($this->returnSelf());
        $standard->expects($this->any())->method('buildFeedRuleSet')->will($this->returnValue($ruleSet));
        $standard->expects($this->any())->method('buildItemRuleSet')->will($this->returnValue($ruleSet));

        $this->object = new Formatter($standard, new NullLogger());
    }

    public function testGetEmptyDocument()
    {
        $this->assertInstanceOf('\DomDocument', $this->object->getEmptyDocument());
    }

    public function testGetDocument()
    {
        $this->assertInstanceOf('\DomDocument', $this->object->getDocument());
    }

    public function testGetAllRules()
    {
        $item = new Item();
        $item->set('title', 'the title');
        $item->set('description', 'the description');

        $rules = $this->object->getAllRules(new RuleSet(), $item);
        $this->assertCount(2, $rules);

        $ruleNames = array('title', 'description');
        foreach ($rules as $rule) {
            $this->assertEquals(current($ruleNames), $rule->getNodeName());
            next($ruleNames);
        }
    }

    public function testToString()
    {
        $feed = new Feed();
        $feed->setTitle('foo-bar');
        $out = $this->object->toString($feed);
        $this->assertInternalType('string', $out);
        $this->assertContains('foo-bar', $out);
        $this->assertEquals('<?xml version="1.0"?>
<channel><feed><title>foo-bar</title></feed></channel>
', $out);
    }

    public function testToDom()
    {
        $feed = new Feed();

        $this->assertInstanceOf('\DomDocument', $this->object->toDom($feed));
    }

    public function testSetItems()
    {
        $feed = new Feed();
        $feed->add(new Item());
        $feed->add(new Item());

        $document = $this->object->getDocument();
        $this->object->setItems($document, $feed);

        $this->assertEquals(2, $document->getElementsByTagName('item')->length);
    }
}
