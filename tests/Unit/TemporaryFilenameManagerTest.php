<?php

namespace Symfony\UX\Upload\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Symfony\UX\Upload\TemporaryFilenameManager;

class TemporaryFilenameManagerTest extends TestCase
{
    public function testTemporaryFilenamesEndWithTheirExtension()
    {
        $tmpFilename = $this->createTestSubject()->generate(
            originalFilename: 'quarterly_report_2023Q4.xlsx',
            mimeType: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        );

        $this->assertStringEndsWith('.xlsx', $tmpFilename);
    }

    public function testCanExtractOriginalFilenameFromTemporaryFilename()
    {
        $originalFilename = 'quarterly_report_2023Q4.xlsx';
        $tmpFilename = $this->createTestSubject()->generate($originalFilename, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $extractedFilename = $this->createTestSubject()->extractOriginalFilename($tmpFilename);

        $this->assertEquals($originalFilename, $extractedFilename);
    }

    private function createTestSubject(): TemporaryFilenameManager
    {
        return new TemporaryFilenameManager();
    }
}