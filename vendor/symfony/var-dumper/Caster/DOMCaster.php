<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Caster;

use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * Casts DOM related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @final
 */
class DOMCaster
{
    private const ERROR_CODES = [
        \DOM_PHP_ERR => 'DOM_PHP_ERR',
        \DOM_INDEX_SIZE_ERR => 'DOM_INDEX_SIZE_ERR',
        \DOMSTRING_SIZE_ERR => 'DOMSTRING_SIZE_ERR',
        \DOM_HIERARCHY_REQUEST_ERR => 'DOM_HIERARCHY_REQUEST_ERR',
        \DOM_WRONG_DOCUMENT_ERR => 'DOM_WRONG_DOCUMENT_ERR',
        \DOM_INVALID_CHARACTER_ERR => 'DOM_INVALID_CHARACTER_ERR',
        \DOM_NO_DATA_ALLOWED_ERR => 'DOM_NO_DATA_ALLOWED_ERR',
        \DOM_NO_MODIFICATION_ALLOWED_ERR => 'DOM_NO_MODIFICATION_ALLOWED_ERR',
        \DOM_NOT_FOUND_ERR => 'DOM_NOT_FOUND_ERR',
        \DOM_NOT_SUPPORTED_ERR => 'DOM_NOT_SUPPORTED_ERR',
        \DOM_INUSE_ATTRIBUTE_ERR => 'DOM_INUSE_ATTRIBUTE_ERR',
        \DOM_INVALID_STATE_ERR => 'DOM_INVALID_STATE_ERR',
        \DOM_SYNTAX_ERR => 'DOM_SYNTAX_ERR',
        \DOM_INVALID_MODIFICATION_ERR => 'DOM_INVALID_MODIFICATION_ERR',
        \DOM_NAMESPACE_ERR => 'DOM_NAMESPACE_ERR',
        \DOM_INVALID_ACCESS_ERR => 'DOM_INVALID_ACCESS_ERR',
        \DOM_VALIDATION_ERR => 'DOM_VALIDATION_ERR',
    ];

    private const NODE_TYPES = [
        \XML_ELEMENT_NODE => 'XML_ELEMENT_NODE',
        \XML_ATTRIBUTE_NODE => 'XML_ATTRIBUTE_NODE',
        \XML_TEXT_NODE => 'XML_TEXT_NODE',
        \XML_CDATA_SECTION_NODE => 'XML_CDATA_SECTION_NODE',
        \XML_ENTITY_REF_NODE => 'XML_ENTITY_REF_NODE',
        \XML_ENTITY_NODE => 'XML_ENTITY_NODE',
        \XML_PI_NODE => 'XML_PI_NODE',
        \XML_COMMENT_NODE => 'XML_COMMENT_NODE',
        \XML_DOCUMENT_NODE => 'XML_DOCUMENT_NODE',
        \XML_DOCUMENT_TYPE_NODE => 'XML_DOCUMENT_TYPE_NODE',
        \XML_DOCUMENT_FRAG_NODE => 'XML_DOCUMENT_FRAG_NODE',
        \XML_NOTATION_NODE => 'XML_NOTATION_NODE',
        \XML_HTML_DOCUMENT_NODE => 'XML_HTML_DOCUMENT_NODE',
        \XML_DTD_NODE => 'XML_DTD_NODE',
        \XML_ELEMENT_DECL_NODE => 'XML_ELEMENT_DECL_NODE',
        \XML_ATTRIBUTE_DECL_NODE => 'XML_ATTRIBUTE_DECL_NODE',
        \XML_ENTITY_DECL_NODE => 'XML_ENTITY_DECL_NODE',
        \XML_NAMESPACE_DECL_NODE => 'XML_NAMESPACE_DECL_NODE',
    ];

<<<<<<< HEAD
    public static function castException(\DOMException $e, array $a, Stub $stub, bool $isNested)
=======
    public static function castException(\DOMException|\Dom\Exception $e, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $k = Caster::PREFIX_PROTECTED.'code';
        if (isset($a[$k], self::ERROR_CODES[$a[$k]])) {
            $a[$k] = new ConstStub(self::ERROR_CODES[$a[$k]], $a[$k]);
        }

        return $a;
    }

    public static function castLength($dom, array $a, Stub $stub, bool $isNested)
    {
        $a += [
            'length' => $dom->length,
        ];

        return $a;
    }

<<<<<<< HEAD
    public static function castImplementation(\DOMImplementation $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castImplementation(\DOMImplementation|\Dom\Implementation $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            Caster::PREFIX_VIRTUAL.'Core' => '1.0',
            Caster::PREFIX_VIRTUAL.'XML' => '2.0',
        ];

        return $a;
    }

<<<<<<< HEAD
    public static function castNode(\DOMNode $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castNode(\DOMNode|\Dom\Node $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'nodeName' => $dom->nodeName,
            'nodeValue' => new CutStub($dom->nodeValue),
            'nodeType' => new ConstStub(self::NODE_TYPES[$dom->nodeType], $dom->nodeType),
            'parentNode' => new CutStub($dom->parentNode),
            'childNodes' => $dom->childNodes,
            'firstChild' => new CutStub($dom->firstChild),
            'lastChild' => new CutStub($dom->lastChild),
            'previousSibling' => new CutStub($dom->previousSibling),
            'nextSibling' => new CutStub($dom->nextSibling),
            'ownerDocument' => new CutStub($dom->ownerDocument),
            'baseURI' => $dom->baseURI ? new LinkStub($dom->baseURI) : $dom->baseURI,
            'textContent' => new CutStub($dom->textContent),
        ];

        if ($dom instanceof \DOMNode || $dom instanceof \Dom\Element) {
            $a += [
                'attributes' => $dom->attributes,
                'namespaceURI' => $dom->namespaceURI,
                'prefix' => $dom->prefix,
                'localName' => $dom->localName,
            ];
        }

        return $a;
    }

    public static function castNameSpaceNode(\DOMNameSpaceNode $dom, array $a, Stub $stub, bool $isNested)
    {
        $a += [
            'nodeName' => $dom->nodeName,
            'nodeValue' => new CutStub($dom->nodeValue),
            'nodeType' => new ConstStub(self::NODE_TYPES[$dom->nodeType], $dom->nodeType),
            'prefix' => $dom->prefix,
            'localName' => $dom->localName,
            'namespaceURI' => $dom->namespaceURI,
            'ownerDocument' => new CutStub($dom->ownerDocument),
            'parentNode' => new CutStub($dom->parentNode),
        ];

        return $a;
    }

    public static function castDocument(\DOMDocument $dom, array $a, Stub $stub, bool $isNested, int $filter = 0)
    {
        $a += [
            'doctype' => $dom->doctype,
            'implementation' => $dom->implementation,
            'documentElement' => new CutStub($dom->documentElement),
            'actualEncoding' => $dom->actualEncoding,
            'encoding' => $dom->encoding,
            'xmlEncoding' => $dom->xmlEncoding,
            'standalone' => $dom->standalone,
            'xmlStandalone' => $dom->xmlStandalone,
            'version' => $dom->version,
            'xmlVersion' => $dom->xmlVersion,
            'strictErrorChecking' => $dom->strictErrorChecking,
            'documentURI' => $dom->documentURI ? new LinkStub($dom->documentURI) : $dom->documentURI,
            'config' => $dom->config,
            'formatOutput' => $dom->formatOutput,
            'validateOnParse' => $dom->validateOnParse,
            'resolveExternals' => $dom->resolveExternals,
            'preserveWhiteSpace' => $dom->preserveWhiteSpace,
            'recover' => $dom->recover,
            'substituteEntities' => $dom->substituteEntities,
        ];

        if (!($filter & Caster::EXCLUDE_VERBOSE)) {
            $formatOutput = $dom->formatOutput;
            $dom->formatOutput = true;
            $a += [Caster::PREFIX_VIRTUAL.'xml' => $dom->saveXML()];
            $dom->formatOutput = $formatOutput;
        }

        return $a;
    }

<<<<<<< HEAD
    public static function castCharacterData(\DOMCharacterData $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castXMLDocument(\Dom\XMLDocument $dom, array $a, Stub $stub, bool $isNested, int $filter = 0): array
    {
        $a += [
            'doctype' => $dom->doctype,
            'implementation' => $dom->implementation,
            'documentElement' => new CutStub($dom->documentElement),
            'inputEncoding' => $dom->inputEncoding,
            'xmlEncoding' => $dom->xmlEncoding,
            'xmlStandalone' => $dom->xmlStandalone,
            'xmlVersion' => $dom->xmlVersion,
            'documentURI' => $dom->documentURI ? new LinkStub($dom->documentURI) : $dom->documentURI,
            'formatOutput' => $dom->formatOutput,
        ];

        if (!($filter & Caster::EXCLUDE_VERBOSE)) {
            $formatOutput = $dom->formatOutput;
            $dom->formatOutput = true;
            $a += [Caster::PREFIX_VIRTUAL.'xml' => $dom->saveXML()];
            $dom->formatOutput = $formatOutput;
        }

        return $a;
    }

    public static function castHTMLDocument(\Dom\HTMLDocument $dom, array $a, Stub $stub, bool $isNested, int $filter = 0): array
    {
        $a += [
            'doctype' => $dom->doctype,
            'implementation' => $dom->implementation,
            'documentElement' => new CutStub($dom->documentElement),
            'inputEncoding' => $dom->inputEncoding,
            'documentURI' => $dom->documentURI ? new LinkStub($dom->documentURI) : $dom->documentURI,
        ];

        if (!($filter & Caster::EXCLUDE_VERBOSE)) {
            $a += [Caster::PREFIX_VIRTUAL.'html' => $dom->saveHTML()];
        }

        return $a;
    }

    public static function castCharacterData(\DOMCharacterData|\Dom\CharacterData $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'data' => $dom->data,
            'length' => $dom->length,
        ];

        return $a;
    }

<<<<<<< HEAD
    public static function castAttr(\DOMAttr $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castAttr(\DOMAttr|\Dom\Attr $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'name' => $dom->name,
            'specified' => $dom->specified,
            'value' => $dom->value,
            'ownerElement' => $dom->ownerElement,
        ];

        if ($dom instanceof \DOMAttr) {
            $a += [
                'schemaTypeInfo' => $dom->schemaTypeInfo,
            ];
        }

        return $a;
    }

<<<<<<< HEAD
    public static function castElement(\DOMElement $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castElement(\DOMElement|\Dom\Element $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'tagName' => $dom->tagName,
        ];

        if ($dom instanceof \DOMElement) {
            $a += [
                'schemaTypeInfo' => $dom->schemaTypeInfo,
            ];
        }

        return $a;
    }

<<<<<<< HEAD
    public static function castText(\DOMText $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castText(\DOMText|\Dom\Text $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'wholeText' => $dom->wholeText,
        ];

        return $a;
    }

<<<<<<< HEAD
    public static function castTypeinfo(\DOMTypeinfo $dom, array $a, Stub $stub, bool $isNested)
    {
        $a += [
            'typeName' => $dom->typeName,
            'typeNamespace' => $dom->typeNamespace,
        ];

        return $a;
    }

    public static function castDomError(\DOMDomError $dom, array $a, Stub $stub, bool $isNested)
    {
        $a += [
            'severity' => $dom->severity,
            'message' => $dom->message,
            'type' => $dom->type,
            'relatedException' => $dom->relatedException,
            'related_data' => $dom->related_data,
            'location' => $dom->location,
        ];

        return $a;
    }

    public static function castLocator(\DOMLocator $dom, array $a, Stub $stub, bool $isNested)
    {
        $a += [
            'lineNumber' => $dom->lineNumber,
            'columnNumber' => $dom->columnNumber,
            'offset' => $dom->offset,
            'relatedNode' => $dom->relatedNode,
            'uri' => $dom->uri ? new LinkStub($dom->uri, $dom->lineNumber) : $dom->uri,
        ];

        return $a;
    }

    public static function castDocumentType(\DOMDocumentType $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castDocumentType(\DOMDocumentType|\Dom\DocumentType $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'name' => $dom->name,
            'entities' => $dom->entities,
            'notations' => $dom->notations,
            'publicId' => $dom->publicId,
            'systemId' => $dom->systemId,
            'internalSubset' => $dom->internalSubset,
        ];

        return $a;
    }

<<<<<<< HEAD
    public static function castNotation(\DOMNotation $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castNotation(\DOMNotation|\Dom\Notation $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'publicId' => $dom->publicId,
            'systemId' => $dom->systemId,
        ];

        return $a;
    }

<<<<<<< HEAD
    public static function castEntity(\DOMEntity $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castEntity(\DOMEntity|\Dom\Entity $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'publicId' => $dom->publicId,
            'systemId' => $dom->systemId,
            'notationName' => $dom->notationName,
            'actualEncoding' => $dom->actualEncoding,
            'encoding' => $dom->encoding,
            'version' => $dom->version,
        ];

        return $a;
    }

<<<<<<< HEAD
    public static function castProcessingInstruction(\DOMProcessingInstruction $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castProcessingInstruction(\DOMProcessingInstruction|\Dom\ProcessingInstruction $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'target' => $dom->target,
            'data' => $dom->data,
        ];

        return $a;
    }

<<<<<<< HEAD
    public static function castXPath(\DOMXPath $dom, array $a, Stub $stub, bool $isNested)
=======
    public static function castXPath(\DOMXPath|\Dom\XPath $dom, array $a, Stub $stub, bool $isNested): array
>>>>>>> d8f983b1cb0ca70c53c56485f5bc9875abae52ec
    {
        $a += [
            'document' => $dom->document,
        ];

        return $a;
    }
}
